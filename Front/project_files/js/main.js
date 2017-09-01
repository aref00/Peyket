var data = {"carts":[]};
    //function addToJson(id,src,name,price){

    //    data.carts.push("id":id,"src":src,"name":name,"price":price);

    //}
    	window.onload = welcome;
  		window.onbeforeunload = confirmExit;
		function welcome () {  

			var obj = localStorage.getItem('cards');
			if (obj !== null) {
			var cards = JSON.parse(obj);
			for (var i=0 ; i<cards.length ; i++ ) {
					CreateCart(cards[i].id,cards[i].name,cards[i].src,cards[i].price);
				}
			console.log('retrievedObject: ', JSON.parse(obj));	
			}
  		}
  		function confirmExit()
  		{
  			
  			var TheCartProducts    =   document.getElementById('cart').getElementsByClassName("row")[0].getElementsByClassName("col-sm-12 col-md-10 col-md-offset-1")[0].getElementsByClassName("table table-hover")[0].getElementsByTagName("tbody")[0]; 
				
			var cards = TheCartProducts.getElementsByTagName("tr");
			localStorage.setItem('count', cards.length);
			var obj = [];
			for (i =0 ; i < cards.length ; i++ ) {
						obj[i] = {"id": cards[i].getAttribute("data_id") , "src": cards[i].getAttribute("data_src") ,"name": cards[i].getAttribute("data_name") ,"price": cards[i].getAttribute("data_price") };
				}
		 		
    	
    		localStorage.setItem('cards', JSON.stringify(obj));
    		return "You have attempted to leave this page.  If you have made any changes to the fields without clicking the Save button, your changes will be lost.  Are you sure you want to exit this page?";
  		}


    function CreateCart(id,name,src,price){



            var TheCartProducts    =   document.getElementById('cart').getElementsByClassName("row")[0].getElementsByClassName("col-sm-12 col-md-10 col-md-offset-1")[0].getElementsByClassName("table table-hover")[0].getElementsByTagName("tbody")[0];

            var tr = document.createElement("TR");

            tr.setAttribute("id","cartItem"+id);//////////////////id

            var td1 = document.createElement("TD");

            //tr.setAttribute("class","col-sm-8 col-md-6");

            var div =   document.createElement("DIV");

            div.setAttribute("class","media");

            var a   =   document.createElement("A");

            a.setAttribute("class","thumbnail pull-left");

            var img =   document.createElement("IMG");

            img.setAttribute("class","media-object");

            img.setAttribute("src",src);/////////////src

            img.setAttribute("style","width: 72px; height: 72px;");

            var div2 = document.createElement("DIV");

            div2.setAttribute("class","media-body");

            var h4 =document.createElement("H4");

            h4.setAttribute("class","media-heading");

            var t = document.createTextNode(name);//////name

            h4.appendChild(t);

            var span  =   document.createElement("SPAN");

            t = document.createTextNode("Status");

            span.appendChild(t);

            var span2  =   document.createElement("SPAN");

            span2.setAttribute("class","text-success");

            var strong  =   document.createElement("STRONG");

            t = document.createTextNode("Available");

            strong.appendChild(t);

            var td2 = document.createElement("TD");

            td2.setAttribute("class","col-sm-1 col-md-1");

            td2.setAttribute("style","text-align: center");

            var input = document.createElement("INPUT");

            input.setAttribute("type","number");

            input.setAttribute("class","form-control");

            input.setAttribute("id","cart_count"+id);

            input.setAttribute("value","1");

            input.setAttribute("min","1");






            var td3 =   document.createElement("TD");

            td3.setAttribute("class","col-sm-1 col-md-1 text-center");

            var strong2 =   document.createElement("STRONG");

            t = document.createTextNode(price);/////////price

            strong2.appendChild(t);



            strong2.id = "cart_price"+id;/////////id



            var td4 =   document.createElement("TD");

            td4.setAttribute("class","col-sm-1 col-md-1 text-center");

            var td5 =   document.createElement("TD");

            td5.setAttribute("class","col-sm-1 col-md-1");

            var strong3 = document.createElement("STRONG");

            t = document.createTextNode(price);

            strong3.appendChild(t);
            strong3.id = "cart_total"+id;

            var button  =   document.createElement("BUTTON");

            button.setAttribute("type","button");

            button.setAttribute("class","btn btn-danger");

            var span3   =   document.createElement("SPAN");

            span3.setAttribute("class", "glyphicon glyphicon-remove");

            t = document.createTextNode("Remove");

            button.appendChild(span3);

            button.appendChild(t);

            button.onclick = function() {removeCartItem(id)};



            //td5

            td5.appendChild(button);



            //td4

            td4.appendChild(strong3);





            //td3

            td3.appendChild(strong2);





            //td2

            td2.appendChild(input);





            //td1

            span2.appendChild(strong);

            div2.appendChild(h4);

            div2.appendChild(span);

            div2.appendChild(span2);

            a.appendChild(img);

            div.appendChild(a);

            div.appendChild(div2);

            td1.appendChild(a);

            td1.appendChild(div);





            tr.appendChild(td1);

            tr.appendChild(td2);

            tr.appendChild(td3);

            tr.appendChild(td4);

            tr.appendChild(td5);
            tr.setAttribute("data_id", id);
            tr.setAttribute("data_name", name);
            tr.setAttribute("data_src", src);
            tr.setAttribute("data_price", price);



            TheCartProducts.insertBefore(tr,TheCartProducts.childNodes[0]);
           



    }



    function storeValue(key, value) {

        if (localStorage) {

            localStorage.setItem(key, value);

        } else {

            $.cookies.set(key, value);

            }

    }



    function getStoredValue(key) {

        if (localStorage) {

            return localStorage.getItem(key);

        } else {

            return $.cookies.get(key);

            }

    }


    function FindIfExists(obj,id){

        var exists = document.getElementById(id);

        return exists;

        /*for(NodeNumber  =   0;  NodeNumber<TheNodeList.lenght;NodeNumber++){

            if(TheNodeList[NodeNumber].id === id){

                return NodeNumber   +   1;

            }

        }

        return 0;*/

    }



    function removeCartItem(id){

        var ItemId = 'cartItem'+id;

        var obj = document.getElementById(ItemId);

        obj.parentNode.removeChild(obj);



        //for (i = 0; i < data.cart.length; i++) {

        //        if(data.cart[i].id === id){

        //            data.cart.splice(i, 1);

        //            //echo "removed"+i;

        //        }

        //}


    }
    
    function showCart () {
    	  document.getElementById('products').setAttribute('class','tab-pane fade') ;

        document.getElementById('cart').setAttribute('class','tab-pane active') ;
    }
    
    
    function Extend (id) {
			var ItemId = 'cart_count'+id;
        var obj = document.getElementById(ItemId);
        obj.value = ++obj.value;
         ItemId = 'cart_total'+id;
       	obj = document.getElementById(ItemId);
       	obj.innerHTML =  parseInt(obj.innerHTML)  + parseInt(obj.innerHTML) ;
        
	}


    function AddToCart(itemToAdd){

        var TheCartProducts    =   document.getElementById('cart').getElementsByClassName("row")[0].getElementsByClassName("col-sm-12 col-md-10 col-md-offset-1")[0].getElementsByClassName("table table-hover")[0].getElementsByTagName("tbody")[0];

        var FoundNodeCount  =   FindIfExists(TheCartProducts,"cartItem"+itemToAdd);

        if(FoundNodeCount   === null){

            var src    =   document.getElementById("img"+itemToAdd).getAttribute("src");

            var name    =  document.getElementById("name"+itemToAdd).textContent;

            var price    =  document.getElementById(itemToAdd).getAttribute("data-price");



            var tr = document.createElement("TR");

            tr.setAttribute("id","cartItem"+itemToAdd);

            var td1 = document.createElement("TD");

            //tr.setAttribute("class","col-sm-8 col-md-6");

            var div =   document.createElement("DIV");

            div.setAttribute("class","media");

            var a   =   document.createElement("A");

            a.setAttribute("class","thumbnail pull-left");

            var img =   document.createElement("IMG");

            img.setAttribute("class","media-object");

            img.setAttribute("src",src);

            img.setAttribute("style","width: 72px; height: 72px;");

            var div2 = document.createElement("DIV");

            div2.setAttribute("class","media-body");

            var h4 =document.createElement("H4");

            h4.setAttribute("class","media-heading");

            var t = document.createTextNode(name);

            h4.appendChild(t);

            var span  =   document.createElement("SPAN");

            t = document.createTextNode("Status");

            span.appendChild(t);

            var span2  =   document.createElement("SPAN");

            span2.setAttribute("class","text-success");

            var strong  =   document.createElement("STRONG");

            t = document.createTextNode("Available");

            strong.appendChild(t);

            var td2 = document.createElement("TD");

            td2.setAttribute("class","col-sm-1 col-md-1");

            td2.setAttribute("style","text-align: center");

            var input = document.createElement("INPUT");

            input.setAttribute("type","number");

            input.setAttribute("class","form-control");

            input.setAttribute("id","cart_count"+itemToAdd);

            input.setAttribute("value","1");

            input.setAttribute("min","1");



            var td3 =   document.createElement("TD");

            td3.setAttribute("class","col-sm-1 col-md-1 text-center");

            var strong2 =   document.createElement("STRONG");

            t = document.createTextNode(price);

            strong2.appendChild(t);



            strong2.id = "cart_price"+itemToAdd;



            var td4 =   document.createElement("TD");

            td4.setAttribute("class","col-sm-1 col-md-1 text-center");

            var td5 =   document.createElement("TD");

            td5.setAttribute("class","col-sm-1 col-md-1");

            var strong3 = document.createElement("STRONG");

            t = document.createTextNode(price);

            strong3.appendChild(t);
            strong3.id = "cart_total"+itemToAdd;

            var button  =   document.createElement("BUTTON");

            button.setAttribute("type","button");

            button.setAttribute("class","btn btn-danger");

            var span3   =   document.createElement("SPAN");

            span3.setAttribute("class", "glyphicon glyphicon-remove");

            t = document.createTextNode("Remove");

            button.appendChild(span3);

            button.appendChild(t);

            button.onclick = function() {removeCartItem(itemToAdd);};

            //td5

            td5.appendChild(button);

            //td4

            td4.appendChild(strong3);


            //td3

            td3.appendChild(strong2);

            //td2

            td2.appendChild(input);


            //td1

            span2.appendChild(strong);

            div2.appendChild(h4);

            div2.appendChild(span);

            div2.appendChild(span2);

            a.appendChild(img);

            div.appendChild(a);

            div.appendChild(div2);

            td1.appendChild(a);

            td1.appendChild(div);

            tr.appendChild(td1);

            tr.appendChild(td2);

            tr.appendChild(td3);

            tr.appendChild(td4);

            tr.appendChild(td5);
            tr.setAttribute("data_id", itemToAdd);
            tr.setAttribute("data_name", name);
            tr.setAttribute("data_src", src);
            tr.setAttribute("data_price", price);

            TheCartProducts.insertBefore(tr,TheCartProducts.childNodes[0]);

            //addToJson(itemToAdd,src,name,price);

        }else {Extend(itemToAdd);}

    }

    function ContinueShoping(){

    	  document.getElementById('products').setAttribute('class','tab-pane active') ;

        document.getElementById('cart').setAttribute('class','tab-pane fade') ;

    }
