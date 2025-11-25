import './bootstrap';
const wrapper = document.querySelector('.category-wrapper');
const next = document.querySelector('.category-next');
const prev = document.querySelector('.category-prev');

next.addEventListener('click', () => {
    wrapper.scrollLeft += 300;
});
prev.addEventListener('click', () => {
    wrapper.scrollLeft -= 300;
});
