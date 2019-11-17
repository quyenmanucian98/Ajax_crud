$(document).ready(function () {
    $('.add').click(function () {
        let index = $(".indexOld:last").data('index');
        // console.log(index);
        let name = $('#name-add').val();
        let age = $('#age-add').val();

        $.ajax({
            url: 'http://127.0.0.1:8000/customers/add',
            type: 'POST',
            dataType: 'json',
            data: {
                nameCustomer: name,
                ageCustomer: age
            },
            success: function (result) {
                // console.log(result.name)
                let printHtml = '';
                printHtml += ` <tr>
                <th class="text-center indexOld" data-index=${(index === undefined) ? 1 : (index + 1)}>${(index === undefined) ? 1 : (index + 1)}</th>
                <th class="text-center" scope="col">${(result.name === null) ? "" : result.name}</th>
                <th class="text-center" scope="col">${(result.age === null) ? "" : result.age}</th>
                <th class="text-center" scope="col" style="width: 220px">
                    <a class="btn btn-danger" href="">DELETE</a>
                    <a class="btn btn-success" href="">EDIT</a>
                </th>
            </tr>`;
                $('#list-customer').append(printHtml);
            }
        });
    });


    $('#search-customer').on('keyup', function () {

        let value = $(this).val();

        $.ajax({
            url: 'http://127.0.0.1:8000/customers/search',
            type: 'POST',
            dataType: 'json',
            data: {keyword: value},
            success: function (result) {
                let table = '';
                $.each(result, function (index, item) {
                    table += `<tr class="customer-{{$customer->id}}" data-id="{{$customer->id}}">
                     <th class="text-center" data-index=${(index === undefined) ? 1 : (index + 1)}>${(index === undefined) ? 1 : (index + 1)}</th>
                    <th class="text-center newName-${item.id}" scope="col">${item.name}</th>
                    <th class="text-center newAge-${item.id}" scope="col">${item.age}</th>
                    <th class="text-center" scope="col" style="width: 220px">`
                });
                $('#list-customer').html(table);
            }
        })
    });

    $('.delete').click(function () {
        if (confirm("Are You Sure?")) {
            let Id = $(this).data('id');
            $.ajax({
                url: 'http://127.0.0.1:8000/customers/' + Id + '/delete',
                type: 'GET',
                dataType: 'json',
                success: function (result) {
                    $('.customer-' + Id).remove();
                }
            })
        }
    });


    $('.edit').click(function () {
        let id = $(this).data('id');
        let nameOld = $(this).parent('th').prev('th').prev('th').text();
        let ageOld = $(this).parent('th').prev('th').text();
        $('#name-new').val(nameOld);
        $('#age-new').val(ageOld);
        $('#id-update').val(id);
        // console.log(id)
    });

    $('.update').click(function () {
        let newName = $('#name-new').val();
        let newAge = $('#age-new').val();
        let idNew = $('#id-update').val();
        // console.log(idNew);
        $.ajax({
            url: 'http://127.0.0.1:8000/customers/' + idNew + '/update',
            type: 'POST',
            dataType: 'json',
            data: {
                newName: newName,
                newAge: newAge
            },
            success: function (result) {
                $('.newName-' + idNew).text(result.name);
                $('.newAge-' + idNew).text(result.age);
            }
        })
    })
});
