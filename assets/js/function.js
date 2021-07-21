$(function () {

    $("input[type='password'][data-eye]").each(function (i) {
        var $this = $(this),
            id = 'eye-password-' + i,
            el = $('#' + id);

        $this.wrap($("<div/>", {
            style: 'position:relative',
            id: id
        }));

        $this.css({
            paddingRight: 60
        });
        $this.after($("<div/>", {
            html: 'Shiko',
            class: 'btn btn-primary btn-sm',
            id: 'passeye-toggle-' + i,
        }).css({
            position: 'absolute',
            right: 10,
            top: ($this.outerHeight() / 2) - 12,
            padding: '2px 7px',
            fontSize: 12,
            cursor: 'pointer',
        }));

        $this.after($("<input/>", {
            type: 'hidden',
            id: 'passeye-' + i
        }));

        var invalid_feedback = $this.parent().parent().find('.invalid-feedback');

        if (invalid_feedback.length) {
            $this.after(invalid_feedback.clone());
        }

        $this.on("keyup paste", function () {
            $("#passeye-" + i).val($(this).val());
        });
        $("#passeye-toggle-" + i).on("click", function () {
            if ($this.hasClass("show")) {
                $this.attr('type', 'password');
                $this.removeClass("show");
                $(this).removeClass("btn-outline-primary");
            } else {
                $this.attr('type', 'text');
                $this.val($("#passeye-" + i).val());
                $this.addClass("show");
                $(this).addClass("btn-outline-primary");
            }
        });
    });

    $(".my-login-validation").submit(function () {
        var form = $(this);
        if (form[0].checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        }
        form.addClass('was-validated');
    });
});


$("input").on("change", function () {
    this.setAttribute(
        "data-date",
        moment(this.value, "YYYY-MM-DD")
        .format(this.getAttribute("data-date-format"))
    )
}).trigger("change")


function darkmode() {
      let darkModeOn = false;

      const createStorage = (name, value) => {
          localStorage.setItem(name, value);
      }

      const readStorage = name => {
          return localStorage.getItem(name);
      }

      const deleteStorage = name => {
          localStorage.removeItem(name);
      }

      const toggleDarkMode = (e) => {
          if (document.body.classList.contains("dark-mode")) {
              document.body.classList.remove("dark-mode");
              darkModeOn = false;
              createStorage("my_preferredMode", "light-mode");
          } else {
              document.body.classList.add("dark-mode");
              darkModeOn = true;
              createStorage("my_preferredMode", "dark-mode");
          }
      }

      document.getElementById("darkMode").addEventListener("click", toggleDarkMode)

      document.addEventListener("DOMContentLoaded", () => {
          if (readStorage("my_preferredMode")) {
              if (readStorage("my_preferredMode") == "dark-mode") {
                  darkModeOn = true;
              } else {
                  darkModeOn = false;
              }
          } else {
              if (window.matchMedia && window.matchMedia("(prefers-color-scheme: dark)").matches) {
                  darkModeOn = true;
              } else {
                  if (document.body.classList.contains("dark-mode")) {
                      darkModeOn = true;
                  } else {
                      darkModeOn = false;
                  }
              }
          }

          if (darkModeOn) {
              if (!document.body.classList.contains("dark-mode")) {
                  document.body.classList.add("dark-mode");
              }
              document.getElementById("darkMode").checked = true
          } else {
              if (document.body.classList.contains("dark-mode")) {
                  document.body.classList.remove("dark-mode");
              }
          }
      })
}