$('#bg') 
.after('<div id="nav">') //needs some position styling
.cycle({ 
    fx:     'fade', 
    speed:  'fast', 
    timeout: 0, 
    pager:  '#nav' 
});
