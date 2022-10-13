$(function() {

    'use_strict'

    const fuck = () => {



        let li = document.createElement('li')
        let ul = document.createElement('ul')
        li.appendChild(document.createTextNode('product successfully remove form cart'))


        ul.appendChild(li)
        let c = document.getElementById('d');
        c.appendChild(ul);

        setTimeout(() => {


            ul.remove()
        }, 2000);

    }

    $(document).on('click', '#delete', function(e) {





        let fid = $(this).attr('map')

        // alert(fid)

        $.ajaxSetup({



            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content")
            }
        })

        $.ajax({


            method: 'get',
            url: `/p/${fid}`,
            async: false


        }).done(m => {

            let data = JSON.parse(m);
            console.log(data.m)
            if (data.m = true) {
                fuck()
                load()
            }

        })

        e.preventDefault()
    })




    const load = () => {



        $.ajax({


            method: 'get',
            url: '/loap',
            async: false,

        }).done((xc) => {




            $('#tbx').html(xc)






        })

    }


    load()

})