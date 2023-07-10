window.onload=function (){

    var url = window.location.pathname;
    url = url.substring(url.lastIndexOf('/'));
    if(url=='/contact'){
        $("#sendMessageButton").click(function (){
            sendMessage();
        });
    }

    if(url=='/cart' || url=='/checkout'){
        fillTotal();
    }

    $("#submitOrder").click(function (){
        submitOrder();
    });

    $("#sendAnswer").click(function (){
        sendMessageToEmail();
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    function sendMessageToEmail(){
        let messageId=$('#messageId').text();
        let name=$('#answerName').text();
        let email=$('#answerEmail').text();
        let message=$('#answerMessage').text();
        let text=$('#answer').val();
        if(text=="" || !text.trim()){
            let fieldText=document.getElementById('textError');
            fieldText.classList.remove('hidden');
            fieldText.innerText='Enter answer';
        }else{
            let fieldText=document.getElementById('textError');
            fieldText.classList.add('hidden');

            let data={
                messageId:messageId,
                name:name,
                email:email,
                message:message,
                text:text
            }
            $.ajax({
                url:'/answermessage',
                method:'POST',
                data:data,
                dataType:'JSON',
                success:function(result){
                    let status=document.getElementById('status');
                    status.innerHTML='Answer sent.';
                    status.classList.add('text-success');
                    status.classList.remove('hidden');
                    const timer=setTimeout(function(){
                        status.classList.remove('add');
                    },2000);
                    const timer1=setTimeout(function(){
                        window.location.href='/adminpanel';
                    },2000);
                },
                error:function (xhr){
                    console.log(xhr);
                    let status=document.getElementById('status');
                    status.innerHTML='An error occurred';
                    status.classList.add('text-danger');
                    status.classList.remove('hidden');
                    const timer=setTimeout(function(){
                        status.classList.remove('add');
                    },2000);
                }
            });
        }
    }
    function submitOrder(){
        checkFirstName();
        checkLastName();
        checkEmail();
        checkAddress();
        checkCity();
        checkPostalCode();
        let country=$('#country').val();
        if(country=="" || !country.trim()){
            let fieldCountry=document.getElementById('errorCountry');
            fieldCountry.classList.remove('hidden');
            fieldCountry.classList.add('text-danger');
            fieldCountry.innerText='Select country.';
        }else{
            let fieldCountry=document.getElementById('errorCountry');
            fieldCountry.classList.add('hidden');
            fieldCountry.innerText='';
        }

        if(checkFirstName() && checkLastName() && checkEmail() && checkAddress() && checkCity() && checkPostalCode() && country.trim()){
            let data={
                first_name:$('#first_name').val(),
                last_name:$('#last_name').val(),
                email:$('#email').val(),
                country:$('#country').val(),
                address:$('#address').val(),
                city:$('#city').val(),
                postal_code:$('#postal_code').val()
            }

            $.ajax({
                url:'/confirmorder',
                type:'POST',
                data:data,
                dataType:'JSON',
                success:function (result){
                    let status=document.getElementById('status');
                    status.innerHTML='Order sent.';
                    status.classList.add('text-success');
                    status.classList.remove('hidden');
                    const timer=setTimeout(function(){
                        status.classList.remove('add');
                    },2000);
                    const timer1=setTimeout(function(){
                        window.location.href='/';
                    },2000);
                },
                error:function (xhr){
                    console.log(xhr);
                    let status=document.getElementById('status');
                    status.innerHTML='An error occurred';
                    status.classList.add('text-danger');
                    status.classList.remove('hidden');
                    const timer=setTimeout(function(){
                        status.classList.remove('add');
                    },2000);
                }
            });
        }
    }

    let regName=/^[A-ZČĆŠĐŽ]{1}[a-zčćšđž]{2,12}$/;
    function checkFirstName(){
        let firstName=$("#first_name").val();
        if (!regName.test(firstName)) {
            let fieldName = document.getElementById("errorFirstName");
            if (firstName == "" || !firstName.trim()) {
                fieldName.innerHTML = "Enter your first name!";
            } else {
                fieldName.innerHTML = "Invalid name format!";
            }
            fieldName.style.color="red";
            fieldName.classList.remove("hidden");
            return false;
        }
        if (regName.test(firstName)) {
            let fieldName = document.getElementById("errorFirstName");
            fieldName.classList.add("hidden");
            return true;
        }
    }

    function checkLastName(){
        let lastName=$("#last_name").val();
        if (!regName.test(lastName)) {
            let fieldLastName = document.getElementById("errorLastName");
            if (lastName == "" || !lastName.trim()) {
                fieldLastName.innerHTML = "Enter your first name!";
            } else {
                fieldLastName.innerHTML = "Invalid name format!";
            }
            fieldLastName.style.color="red";
            fieldLastName.classList.remove("hidden");
            return false;
        }
        if (regName.test(lastName)) {
            let fieldLastName = document.getElementById("errorLastName");
            fieldLastName.classList.add("hidden");
            return true;
        }
    }

    function checkAddress(){
        let regAddress= /^[A-ZČĆŠĐŽ]{1}[a-zčćšđž]{2,15}(\s[A-ZČĆŠĐŽa-zčćšđž0-9]{1,15})+$/;
        let address=document.getElementById("address").value;
        if (!regAddress.test(address)) {
            let fieldAddress = document.getElementById("errorAddress");
            if (address == "" || !address.trim())
                fieldAddress.innerHTML = "Enter your address";
            else fieldAddress.innerHTML = "Invalid address format!";
            fieldAddress.style.color="red";
            fieldAddress.classList.remove("hidden");
            return false;
        }
        if (regAddress.test(address)) {
            let fieldAddress = document.getElementById("errorAddress");
            fieldAddress.classList.add("hidden");
            return true;
        }
    }

    function checkCity(){
        let regCity=/^[a-zA-Z\u0080-\u024F]+(?:[\s-][a-zA-Z\u0080-\u024F]+)*$/
        let city=document.getElementById("city").value;
        if (!regCity.test(city)) {
            let fieldCity = document.getElementById("errorCity");
            if (city == "" || !city.trim())
                fieldCity.innerHTML = "Enter city name";
            else fieldCity.innerHTML = "Invalid city name!";
            fieldCity.style.color="red";
            fieldCity.classList.remove("hidden");
            return false;
        }
        if (regCity.test(city)) {
            let fieldCity = document.getElementById("errorCity");
            fieldCity.classList.add("hidden");
            return true;
        }
    }

    function checkPostalCode(){
        let regZip=/^\d{5}$/;
        let postal_code=$("#postal_code").val();
        if (!regZip.test(postal_code)) {
            let fieldZip = document.getElementById("errorZip");
            if (postal_code == "" || !postal_code.trim())
                fieldZip.innerHTML = "Enter postcode/ZIP!";
            else fieldZip.innerHTML = "Invalid postcode/ZIP!";
            fieldZip.style.color="red";
            fieldZip.classList.remove("hidden");
            return false;
        }
        if (regZip.test(postal_code)) {
            let fieldZip = document.getElementById("errorZip");
            fieldZip.classList.add("hidden");
            return true;
        }
    }
    function fillTotal(){
        let s=0;
        let price=$(".price");
        if(price.length!=0){
            for(let i=0;i<price.length;i++){
                price[i]=price[i].innerHTML;
                s=s+parseInt(price[i].substring(1));
            }
            let subtotal=document.getElementById('subtotal');
            subtotal.innerHTML='$'+s+'.00';
            let total=document.getElementById('total');
            let st=s+10;
            total.innerHTML='$'+st+'.00';
        }

    }
    function sendMessage(){
        checkName();
        checkEmail();
        let subject=document.getElementById('subject').value;
        if(!subject.trim() || subject == ""){
            let errorSubject=document.getElementById('errorSubject');
            errorSubject.innerHTML = "Enter subject!";
            errorSubject.classList.add('mb-1');
            errorSubject.style.color="red";
            errorSubject.classList.remove("hidden");
        }else{
            let errorSubject=document.getElementById('errorSubject');
            errorSubject.classList.add("hidden");
        }
        let message=document.getElementById('message').value;
        if(!message.trim() || message == ""){
            let errorMessage=document.getElementById('errorMessage');
            errorMessage.innerHTML = "Enter message!";
            errorMessage.classList.add('mb-1');
            errorMessage.style.color="red";
            errorMessage.classList.remove("hidden");
        }else{
            let errorMessage=document.getElementById('errorMessage');
            errorMessage.classList.add("hidden");
        }
        if(checkName() && checkEmail() && subject.trim() && subject != "" && message.trim() && message != ""){
            let data={
                name:$("#name").val(),
                email:$("#email").val(),
                subject:subject,
                message:message
            }

            $.ajax({
                url: '/messages',
                type: 'POST',
                data: data,
                dataType: 'JSON',
                success: function (result) {
                    let status=document.getElementById('status');
                    status.classList.add('text-success');
                    status.classList.add('mt-2');
                    status.classList.remove('hidden');
                    status.innerHTML="Message sent.";
                    const timer=setTimeout(function(){
                        window.location.href = '/contact';
                    },2000);
                },
                error: function (xhr) {
                    console.log(xhr);
                    let status=document.getElementById('status');
                    status.classList.add('text-danger');
                    status.classList.add('mt-2');
                    status.classList.remove('hidden');
                    status.innerHTML="Message not sent.";
                    const timer=setTimeout(function(){
                        status.classList.add('hidden');
                    },2000);
                }
            });
        }
    }

    function checkName(){
        let name=document.getElementById('name').value;
        let regName= /^[A-ZČĆŠĐŽ][a-zčćšđž]{2,15}(\s[A-ZČĆŠĐŽ][a-zčćšđž]{2,15})?(\s[A-ZČĆŠĐŽ][a-zčćšđž]{2,20})\s*$/;
        name.replace(/\s\s+/g, " ");
        if (!regName.test(name)) {
            let errorName = document.getElementById("errorName");
            if (name == "" || !name.trim()) {
                errorName.innerHTML = "Enter your name and last name!";
            } else {
                errorName.innerHTML = "Invalid name format!";
            }
            errorName.style.color="red";
            errorName.classList.add('mb-1');
            errorName.classList.remove("hidden");
            return false;
        }
        if (regName.test(name)) {
            let errorName = document.getElementById("errorName");
            errorName.classList.add("hidden");
            return true;
        }
    }

    function checkEmail(){
        let email=document.getElementById('email').value;
        let regEmail=/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
        if (!regEmail.test(email)) {
            let errorEmail = document.getElementById("errorEmail");
            if (email == "" || !email.trim())
                errorEmail.innerHTML = "Enter email!";
            else errorEmail.innerHTML = "Invalid email format!";
            errorEmail.style.color="red";
            errorEmail.classList.add('mb-1');
            errorEmail.classList.remove("hidden");
            return false;
        }
        if (regEmail.test(email)) {
            let errorEmail = document.getElementById("errorEmail");
            errorEmail.classList.add("hidden");
            return true;
        }
    }

}

function dodajUkorpu(product_id){
    var size=checkSizeSelected();
    var qty=checkQuantity();
    let product={
        size:size,
        qty:parseInt(qty),
        product_id:product_id
    }

    if(size && qty){
        $.ajax({
            url: '/addcart',
            type: 'POST',
            data: product,
            dataType: 'JSON',
            success: function (result) {
                let status=document.getElementById('status');
                status.classList.add('text-success');
                status.classList.add('mt-2');
                status.innerHTML="Added to cart.";
            },
            error: function (xhr) {
                console.log(xhr);
                let status=document.getElementById('status');
                status.classList.add('text-danger');
                status.classList.add('mt-2');
                status.innerHTML="An error occured.";
            }
        });
    }
}

function checkSizeSelected(){
    if($(".size:checked").length!=0){
        for(let i=0;i<($(".size").length);i++){
            if($(".size:checked")){
                if(!document.getElementById("sizes").classList.contains("hidden")){
                    document.getElementById("sizes").classList.add("hidden");
                }
                return ($(".size:checked").val());
            }
        }

    }else{
        document.getElementById("sizes").classList.remove("hidden");
        return false;
    }
}

function checkQuantity(){
    let qty=document.getElementById("qty").value;
    if(qty<1 || qty>99){
        document.getElementById("quantityError").classList.remove("hidden");
        return false;
    }else{
        document.getElementById("quantityError").classList.add("hidden");
        return qty;
    }
}

function deleteProductFromCart(size,product_id){
    let data={
        product_id:product_id,
        size:size
    }
    console.log(data);
    $.ajax({
        type:'POST',
        url:'/deletefromcart',
        data:data,
        dataType:'JSON',
        success:function(){
            let field=document.getElementById('status');
            field.classList.add('text-success');
            field.classList.remove('hidden');
            field.innerHTML='Removed from cart.';
            const timer=setTimeout(function(){
                field.classList.add('hidden');
            },2000);
            window.location.href='/cart';
        },
        error:function(xhr){
            console.log(xhr);
            let field=document.getElementById('status');
            field.classList.add('text-danger');
            field.classList.remove('hidden');
            field.innerHTML='An error occurred.';
            const timer=setTimeout(function(){
                field.classList.add('hidden');
            },2000);
        }
    });
}
