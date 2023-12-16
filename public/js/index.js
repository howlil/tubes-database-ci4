document.addEventListener('DOMContentLoaded', function() {
    const marquee = document.querySelector('.marquee-content');
    let scrollAmount = 0;
  
    function scrollMarquee() {
      scrollAmount += 2; // Adjust for speed
      if (scrollAmount >= marquee.offsetWidth / 2) {
        scrollAmount = 0;
      }
      marquee.style.transform = `translateX(-${scrollAmount}px)`;
    }
  
    setInterval(scrollMarquee, 20); // Adjust for speed
  });
  