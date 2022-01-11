

class FragPopUp{
    
    color = "";
    txt = "";
    time = 0;
    
    constructor(color, txt, time = 5){
        this.color = color;
        this.txt = txt;
        this.time = time * 1000;
        this.displayPop();
    }

    displayPop() {
        let pop_div = document.createElement("div");
        if(this.color == "green")
        pop_div.classList = "Frag-pop pop-green";
        else
        pop_div.classList = "Frag-pop pop-red";
        let left = document.createElement("div");
        left.className = "Frag-pop-leftpart";
        let close = document.createElement("p");
        close.innerHTML="x";
        close.classList="Frag-pop-close";

    
        let text = document.createElement("p");
        text.innerHTML = this.txt;
        
        left.appendChild(text);
        pop_div.appendChild(left);
        pop_div.appendChild(close);
        document.body.insertBefore(pop_div, document.body.firstChild);

        close.addEventListener("click", event => {this.hidePop()});
        setTimeout(this.hidePop, this.time);
    }

    hidePop(){
        let pops = document.querySelectorAll(".Frag-pop");
        pops.forEach(pop => {
            pop.classList.add("Frag-pop-out");
            setTimeout(function(){pop.remove();}, 2000);
        });
        delete this;
    }
}


function loadPop(){
    var pop = new FragPopUp("josué", "ouiiii", 5);
}