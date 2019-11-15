$(document).ready(function () {
    $('.add').click(function () {
        let index = $(".indexOld:last").data('index');
        // console.log(index)
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
                <th class="text-center indexOld" data-index=${(index===undefined)?1:(index+1)}>${(index===undefined)?1:(index+1)}</th>
                <th class="text-center" scope="col">${(result.name===null)?"":result.name}</th>
                <th class="text-center" scope="col">${(result.age===null)?"":result.age}</th>
                <th class="text-center" scope="col" style="width: 220px">
                    <a class="btn btn-danger" href="">DELETE</a>
                    <a class="btn btn-success" href="">EDIT</a>
                </th>
            </tr>`;
                $('#list-customer').append(printHtml);
            }
        });
    })
});
