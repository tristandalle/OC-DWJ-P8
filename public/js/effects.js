var effect = {
    eltTitle : document.getElementById('title_box'),
    elthOne: document.getElementById('hOne'),
    elthTwo: document.getElementById('hTwo'),
    eltLogo : document.getElementById('logo'),
    eltImgAbout : document.getElementById('img_about'),
    eltSubtitleAbout : document.getElementById('h1_about'),
    eltSignal : document.getElementsByClassName('signal_color'),
    
    
    
    init : function(){
        if(effect.eltTitle != null){
            effect.startTitle();
        }
        if(effect.elthOne != null && effect.elthTwo != null){
            effect.startTitle();
        } 
        if(effect.eltLogo != null){
            effect.startLogo();
        }
        if(effect.eltImgAbout != null){
            effect.startImgAbout();
        }
        if(effect.eltSubtitleAbout != null){
            effect.startStAbout();
        }
        effect.colorSignal();
        
    },
    
    colorSignal: function(){
        for (i=0; i<effect.eltSignal.length; i++){
            if(effect.eltSignal[i].textContent === "Ce commentaire a été validé "){
                effect.eltSignal[i].style.color = "#16B84E";
            }
            else if(effect.eltSignal[i].textContent === "Ce commentaire a été signalé"){
                effect.eltSignal[i].style.color = "#FF0000 ";
            }
            else if(effect.eltSignal[i].textContent === "Signaler ce commentaire"){
                effect.eltSignal[i].style.color = "#053C5E";
            }
        }
    },
    
    
    startTitle: function(){
        effect.eltTitle.style.opacity = 1;
        setTimeout(function(){
        effect.elthOne.style.opacity = 1;
        },1000);
        setTimeout(function(){
        effect.elthTwo.style.opacity = 1;
        },2000);
    },
    
    startLogo: function(){
        effect.eltLogo.style.top = 10 + "px";
    },
    
    startImgAbout: function(){
        effect.eltImgAbout.style.width = 20 + "vw";
    },
    
    startStAbout: function(){
        setTimeout(function(){
           effect.eltSubtitleAbout.style.opacity = 1;        
                   }, 2000);   
    },
    
    
    
}

window.onload = effect.init

