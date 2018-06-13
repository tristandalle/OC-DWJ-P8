var effect = {
    eltTitle : document.getElementById('title_box'),
    elthOne: document.getElementById('hOne'),
    elthTwo: document.getElementById('hTwo'),
    eltLogo : document.getElementById('logo'),
    eltImgAbout : document.getElementById('img_about'),
    eltSubtitleAbout : document.getElementById('h1_about'),
    
    
    
    init : function(){
        effect.startTitle()
        effect.startLogo()
        effect.startImgAbout()
        effect.startStAbout()
        
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

