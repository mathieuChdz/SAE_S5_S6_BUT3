window.onload = function () {

  const popup_warning = document.getElementsByClassName("warning-popup");
  const menu_span = document.getElementsByClassName("nav-resp-menu");

  for (let popup_item = 0; popup_item < popup_warning.length; popup_item++) {
    popup_warning[popup_item].getElementsByClassName("material-symbols-outlined")[0].addEventListener('click', (event) => {
      popup_open(popup_warning[popup_item].getAttribute("id"));
    });
  }

  menu_span[0].addEventListener('click', (event) => {
    open_menu();
  });


  
  /**
     * Permet l'ouverture des popups du footer
     * 
     * @return {void}
     */
  function popup_open(id) {
  
      const nav = document.getElementsByTagName('nav')
      const popup_div = document.getElementById("popup-content");
      const popup_div_item = document.getElementById("popup-content-item");
      const popup_titre = popup_div.getElementsByTagName("h1")[0];
      const popup_content = popup_div.getElementsByTagName("p")[0];
      const popup_div_list = document.getElementsByClassName("content-item-p");
      const html = document.getElementsByTagName("html");
  
      popup_div.style.display = "block";
  
      popup_div.style.opacity = "0";
      setTimeout(() => {
        popup_div.style.opacity = "1";
        popup_div.style.transition = "opacity 0.5s";
      }, 100);
      nav[0].style.zIndex = 0;
  
      html[0].style.overflowY = "hidden";
      var span = document.getElementsByClassName("close")[0];
  
      span.onclick = function () {
          
        html[0].style.overflowY = "overlay";
        popup_div_item.style.bottom = "10%";
  
        popup_div.style.opacity = "0";
        popup_div.style.transition = "opacity 0.5s";
        setTimeout(() => {
          popup_div.style.display = "none";
        }, 500);
        for (var i = 0; i < popup_div_list.length; i++) {
          popup_div_list[i].style.display = "none";
        }
        nav[0].style.zIndex = 1000;
      }
  
      if (id == "1") {
        popup_titre.innerHTML = "Le calcul distribué";
        popup_div_list[0].style.display = "block";
      }
    }

  /**
   * Permet la fermeture du menu burger.
   * 
   * @return {void}
   */
    function open_menu() {

      menu_span[0].addEventListener('click', () => {
        close_menu();
      })

      var menu_resp = document.getElementsByClassName("responsive-menu");
      var menu_items = menu_resp[0].getElementsByTagName("a");

      setTimeout(() => {
        for (let i = 0; i < menu_items.length; i++) {
          menu_items[i].style.transform ="translateX(0)";
          menu_items[i].style.transition ="transform 0.7s";
        }
      }, 100);
    }

    /**
   * Permet la fermeture du menu burger.
   * 
   * @return {void}
   */
    function close_menu() {

      menu_span[0].addEventListener('click', () => {
        open_menu();
      })

      var menu_resp = document.getElementsByClassName("responsive-menu");
      var menu_items = menu_resp[0].getElementsByTagName("a");

      for (let i = 0; i < menu_items.length; i++) {

        if (i%2==0){
          menu_items[i].style.transform ="translateX(600%)";
          menu_items[i].style.transition ="transform 0s";
        }
        else{
          menu_items[i].style.transform ="translateX(-600px)";
          menu_items[i].style.transition ="transform 0s";
        }

      }
    }
}

