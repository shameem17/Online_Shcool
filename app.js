const navSlide = () => {
	const boxes = document.querySelector('.boxes');
	const nav = document.querySelector('.nav-items');
	boxes.addElementListener('click',()=>{
		nav.classList.toggle('nav-active');
	});
}
const app=() =>{
	navSlide();
}