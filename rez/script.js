const allQuestions = document.querySelectorAll('.visible-pannel');
console.log(allQuestions);


allQuestions.forEach(element => {

    element.addEventListener('click', function(){

        console.log(this.childNodes);

        const height = this.parentNode.childNodes[3].scrollHeight;

        const currentChoice = this.parentNode.childNodes[3];

        // console.log(this.src);
        // console.log(this.classList);

        if(this.childNodes[5].style.display == "none"){
            this.childNodes[3].style.display = "none";
            this.childNodes[5].style.display = "block";
            gsap.to(currentChoice, {duration: 0.2, height: height + 40, opacity: 1, padding: '20px 15px'})
        } else {
            this.childNodes[3].style.display = "block";
            this.childNodes[5].style.display = "none";
            gsap.to(currentChoice, {duration: 0.2, height: 0, opacity: 0, padding: '0px 15px'})
        }
        
    })

})