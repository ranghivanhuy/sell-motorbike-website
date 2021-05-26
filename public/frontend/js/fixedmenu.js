document.addEventListener('DOMContentLoaded',function(){
	var status=0;
	var doituongmenu = document.querySelector('#navigation');
	window.addEventListener('scroll',function(){
		console.log(window.pageYOffset);
		if(window.pageYOffset>120){
			if(status==0){
				console.log("tren 150 rồi");
				status=1;
				doituongmenu.classList.add('stop');
			}
		}
		if(window.pageYOffset<=150){
			if(status==1){
				console.log("duoi 120 rồi");
				status=0;
				doituongmenu.classList.remove('stop');
			}
		}

	})
	
},false)