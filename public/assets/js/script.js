$(function () {
  "use_strict";

  const create = (zi) => {
    let div = document.createElement("div");
    div.classList.add("container");

    let ul = document.createElement("ul");
    let li = document.createElement("li");
    li.appendChild(document.createTextNode(zi));
    ul.appendChild(li);
    ul.setAttribute("x", "to much fun");
    div.appendChild(ul);
    document.getElementById("vox").appendChild(div);

    setTimeout(() => {
      div.remove();
    }, 1000);
  };

  $("#t").DataTable();
  $.ajaxSetup({
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
  });

  function load() {
    $.ajax({
      method: "get",
      url: "/load",

      async: false,
    }).done((m) => {
      $("#tb").html(m);
    });
  }
  load();
  $(".f").one("click", function (e) {
    let c = $(this).attr("value");

    $.ajax({
      method: "get",
      url: `/dlt/${c}`,

      async: false,
    }).done((m) => {
      load();
    });

    e.preventDefault();
  });

  let lol = () => {
    let name = $("#name").val("");
    let price = $("#price").val("");
    let des = $("#des").val("");
  };
  let showData = () => {
    $.ajax({
      method: "get",
      url: "/food/all",

      async: false,
    }).done((ne) => {
      $("#th").html(ne);
    });
  };
  showData();
  $("#dick")
    .unbind()
    .submit(function (e) {
      let name = $("#name").val();
      let price = $("#price").val();
      let des = $("#des").val();
      if (!name || !price || !des) {
        create("All field are Required");
      } else {
        $.ajax({
          method: "post",
          url: "/food",
          data: new FormData(this),
          contentType: false,
          processData: false,
          async: false,
        }).done((e) => {
          let m = JSON.parse(e);

          lol();
          showData();
          if (m.success == true) {
            create("data inserted Successfully");
          }
        });
      }

      e.preventDefault();
    });

  $(".t").click(function (e) {
    let mc = $(this).attr("value");

    $.ajax({
      method: "get",
      url: `/edit/${mc}`,
      dataType: "json",

      async: false,
    }).done((m) => {
      $("#name1").val(m.data.title);
      $("#price1").val(m.data.price);
      $("#id1").val(m.data.id);
      $("#des1").val(m.data.description);
      $("#s1").attr("src", m.data.photo);
    });

    e.preventDefault();
  });

  $("#sick")
    .unbind()
    .submit(function (e) {
      let name = $("#name1").val();
      let price = $("#price1").val();
      let des = $("#des1").val();
      if (!name || !price || !des) {
        create("all field are required");
      } else {
        $.ajax({
          method: "post",
          url: "/food/update",
          data: new FormData(this),
          contentType: false,
          processData: false,
          async: false,
        }).done((e) => {
          let m = JSON.parse(e);
          console.log(m.success);

          showData();
          if (m.success == "update") {
            create("data updated Successfully");
          }
        });
      }

      e.preventDefault();
    });

  $(".dd")
    .unbind()
    .click(function (e) {
      let c = $(this).attr("value");
      $.ajax({
        url: `/dlt/${c}`,
        method: "get",
      }).done((m) => {
        showData();
      });

      e.preventDefault();
    });
});

document.getElementById("hide").addEventListener("change", url);
document.getElementById("hide1").addEventListener("change", url1);

function url(e) {
  document.getElementById("s").src = URL.createObjectURL(this.files[0]);
  // document.getElementById('s1').src = URL.createObjectURL(this.files[0])
}

function url1(e) {
  // document.getElementById('s').src = URL.createObjectURL(this.files[0])
  document.getElementById("s1").src = URL.createObjectURL(this.files[0]);
}

function c() {
  alert("lol");
}
