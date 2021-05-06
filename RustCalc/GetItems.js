const app = document.getElementById('root');

const container = document.createElement('div');
container.setAttribute('class', 'container');
container.setAttribute('id', 'container');

app.appendChild(container);


document.getElementById("search-button").addEventListener("click", function()
{
    //Variable with a new XMLHttpRequest assigned to it. 
    var request = new XMLHttpRequest();
    
    //Establishing a new connection using a GET request.
    request.open('GET', './items.json', true);
    
    request.onload = function()
{
    //Accessing JSON data
    var data = JSON.parse(this.response);
    var inputVal = document.getElementById("search-input").value.toUpperCase();

    if(request.status >= 200 && request.status < 400)
    {   
        var number = document.getElementById("num-input").value;
        
        if(number === "")
        {
        number = 1;
        }
        else if(number == 0)
        {
            console.log("ggdfgf");
            number = 1;
        }
        var containerClear = document.getElementById("container");
            containerClear.innerHTML = "";
            
            data.items.forEach(record => 
            {
                var upperDisplayName = record.displayName.toUpperCase();
                if(upperDisplayName.indexOf(inputVal) >= 0)
                {
                //creating DOM elements that will be used to display the data
                //to the user
                const card = document.createElement('div');
                card.setAttribute('class', 'card');
                card.setAttribute('id', 'card');
                
                //h1 for record title
                const h1 = document.createElement('h1');
                h1.textContent = record.displayName;
                
                //p for the record object 
                const p = document.createElement('p');
                record.shortName = record.shortName.substring(0, 300);
                p.textContent = `Item -  ` + `${record.shortName}`;
                
                //p for the record location
                const p_ = document.createElement('p');
                record.category = record.category.substring(0, 300);
                p_.textContent = `Type -  ` + `${record.category}`;
        
                // Append the cards to the container element
                container.appendChild(card);
                
                // Each card will contain an h1 and a p (for each object made)
                card.appendChild(h1);
                card.appendChild(p);
                card.appendChild(p_);
               
                var itemName = record.mats.itemName;
                var itemCost = record.mats.itemCost;
                var itemDisplay = "";
                
                for(var i = 0; i < itemName.length; i++)
                {
                    const _p = document.createElement('p');

                    itemDisplay = (itemName[i] + (itemCost[i] * number)+ "|").substring(0, 300);
                    itemDisplay = itemDisplay.split('|').join("\r\n");
                    
                    _p.textContent += itemDisplay;
                    card.appendChild(_p);
                    
                }
               }
            });
        }    
    };
//send the request
request.send();
});

function numInputCheck(evt)
{
    var theEvent = evt || window.event;
    var regex = /[0-9]|\./;
    
    // Handle paste
    if (theEvent.type === 'paste') 
    {
        key = event.clipboardData.getData('text/plain');
    } 
    else 
    {
        // Handle key press
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode(key);
        console.log("number assigned");
        
        if(!regex.test(key))
        {
            theEvent.returnValue = false;
            if(theEvent.preventDefault) theEvent.preventDefault();
        }
    }
}