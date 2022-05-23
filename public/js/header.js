
    $('#menu > li').hover(function() {
        // khi thẻ menu li bị hover thì drop down menu thuộc thẻ li đó sẽ trượt xuống(hiện)
        $('.dropdown_menu', this).slideDown();
      },function() {
        // khi thẻ menu li bị out không hover nữa thì drop down menu thuộc thẻ li đó sẽ trượt lên(ẩn)
        $('.dropdown_menu', this).slideUp();
      });
    
      $('.dropdown_menu > li').hover(function() {
        // khi thẻ dropdown_menu li bị hover thì submenusubmenu thuộc thẻ li đó sẽ trượt xuống(hiện)
        $('.submenu', this).slideDown();
      },function() {
        // khi thẻ dropdown_menu li bị hover thì submenusubmenu thuộc thẻ li đó sẽ trượt lên(ẩnẩn)
        $('.submenu', this).slideUp();
      });