$(function() {

    'use_strict';




    let dom = cn => {
        let div = document.createElement('div');
        div.classList.add('container');

        let ul = document.createElement('ul');
        let li = document.createElement('li');
        li.appendChild(document.createTextNode(cn));
        ul.appendChild(li);
        ul.setAttribute("x", 'to much fun')
        div.appendChild(ul)
        document.getElementById('cox').appendChild(div)


        setTimeout(() => {
            div.remove();

        }, 1000)
    }


    $.ajaxSetup({





        'headers': {


            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')


        }
    })
    $('#t').DataTable();



    let load = () => {



        $.ajax({



            method: "get",
            url: '/chef/load',
            async: false
        }).done(e => {
            $('#th').html(e)
        })




    }
    load()

    let clean = () => {

        $("#name").val(" ")
        $("#role").val(" ")
        $('#s').attr('src', " ")

    }

    $('#dick').unbind().submit(function(e) {





        $name = $("#name").val()
        $role = $("#role").val()
        if (!$name || !$role) {




            dom("all field are Required ")


        } else {
            $.ajax({


                url: '/chef',
                method: 'post',
                data: new FormData(this),
                contentType: false,
                processData: false,
                async: false
            }).done(e => {


                load();
                clean()
                let b = JSON.parse(e)

                if (b.success == true) {
                    dom("data Inserted Successfully")
                }



            })

        }



        e.preventDefault();
    })


    $('#sick').unbind().submit(function(e) {






        $.ajax({
            method: 'post',
            url: "/chef/update",
            data: new FormData(this),
            contentType: false,
            processData: false,
            async: false

        }).done(c => {
            let dw = JSON.parse(c)

            load();
            if (dw.success == true) {
                dom("data Updatetd Successfully")
            }
        })



        e.preventDefault()
    })

    $('.t').unbind().click(function(e) {
        let id = $(this).attr('value');





        $.ajax({



            method: 'get',
            url: `/chef/edit/${id}`,
            dataType: 'json'

        }).done(x => {

            $('#name1').val(x.data.name)
            $('#role1').val(x.data.role)
            $('#id').val(x.data.id)
            $('#s1').attr('src', x.data.photo)

        })
        e.preventDefault();
    })



    $('.dd').unbind().click(function(e) {





        let pi = $(this).attr('value')

        $.ajax({
            method: 'get',
            url: `/chef/dlt/${pi}`
        }).done(e => {
            load()
            console.log(e)
        })

        e.preventDefault()
    })





})



document.getElementById('hide').addEventListener('change', xp)
document.getElementById('hide1').addEventListener('change', xp1)




function xp() {



    document.getElementById('s').src = URL.createObjectURL(this.files[0])


}

function xp1() {



    document.getElementById('s1').src = URL.createObjectURL(this.files[0])


}