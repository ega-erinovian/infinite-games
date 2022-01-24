</body>
<!-- Custom JS -->
<script src="assets/js/script.js"></script>
<!-- Boostrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
</script>
<!-- ScrollReveal JS -->
<script src="https://unpkg.com/scrollreveal"></script>
<script>
ScrollReveal({
    distance: '100px',
    origin: 'bottom'
});
ScrollReveal().reveal('.header-title');
ScrollReveal().reveal('.about-title', {
    delay: 100,

});
ScrollReveal().reveal('.about-text', {
    delay: 300,
});
ScrollReveal().reveal('.about-video', {
    delay: 500,
});
ScrollReveal().reveal('.desc-container', {
    delay: 700,
});
ScrollReveal().reveal('.btn-games', {
    interval: 100,
    reset: true,
});
</script>

</html>