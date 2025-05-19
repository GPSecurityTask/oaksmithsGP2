console.log(
    "%cBem-vindo à Oak Smiths!",
    "color: #8B4513; background-color: #f5f0e6; font-size: 16px; font-weight: bold; padding: 8px 16px; border: 2px solid #a0522d; border-radius: 6px;"
  );
  
  document.addEventListener('DOMContentLoaded', function() {
      const heroText = document.querySelector('.hero');
      if (heroText) {
          heroText.style.opacity = 0;
          heroText.style.transform = 'translateY(20px)';
          
          setTimeout(() => {
              heroText.style.transition = 'opacity 1s ease, transform 1s ease';
              heroText.style.opacity = 1;
              heroText.style.transform = 'translateY(0)';
          }, 500); 
      }
  });
  
  const menuLinks = document.querySelectorAll('nav ul li a');
  
  menuLinks.forEach(link => {
      link.addEventListener('click', function(event) {
          if (this.getAttribute("href").startsWith("#")) {
              event.preventDefault();
              alert(`Você clicou em: ${this.textContent}`);
          }
      });
  });
  