function bootnavbar(options) {
  const defaultOption = {
    selector: "main_navbar",
    animation: true,
    animateIn: "animate__fadeIn",
  };

  const bnOptions = { ...defaultOption, ...options };

  init = function () {
    var dropdowns = document
      .getElementById(bnOptions.selector)
      .getElementsByClassName("dropdown");

    Array.prototype.forEach.call(dropdowns, (item) => {
      //add animation
      if (bnOptions.animation) {
        const element = item.querySelector(".dropdown-menu");
        if(element){
          element.classList.add("animate__animated");
          element.classList.add(bnOptions.animateIn);
        }
        
      }

      //hover effects
      item.addEventListener("mouseover", function () {
        this.classList.add("show");
        const element = this.querySelector(".dropdown-menu");
        element.classList.add("show");
      });

      item.addEventListener("mouseout", function () {
        this.classList.remove("show");
        const element = this.querySelector(".dropdown-menu");
        element.classList.remove("show");
      });
    });
  };

  init();
}
// Search box
var searchBox = $(".search-box-wrap .search-form");
        const searchIcon = $(".search-icon i");
        searchBox.hide();
        searchIcon.on('click', function(event) {
            searchIcon.toggleClass("fa-search");
            searchIcon.toggleClass("fa-times");

            searchBox.slideToggle();
            $(this).closest('.search-box-wrap').find('input').focus();
        });


// course content li display

const contentUls = document.querySelectorAll(".course-content ul")
const contentLis = document.querySelectorAll(".course-content ul li")

contentUls.forEach((contentUl) =>{
  let childLi = contentUl.querySelectorAll('li');
  childLi.forEach((child)=> {
    childLength = childLi.length
    childLength > 5 ? contentUl.classList.add("course-50") : contentUl.classList.remove("course-50")
    // child.classList.add("course-50")
    
    
      //console.log(child.innerHTML.length);
    } )
})
contentLis.forEach((contentLi)=> {
//  console.log(contentLi.innerHTML.length);
} )



  