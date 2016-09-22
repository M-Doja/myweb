(function(){
  var vm = this;
    vm.loading = false;

  vm.send = function (mail){
    vm.loading = true;
    console.log(mail);
		vm.from = document.getElementById('from').value;
		console.log(vm.from);
    $http.post('/sendmail', {
      to: 'dojadeveloper@gmail.com',
			from: 'mdunson@dot.com',
      subject: 'Message from '+vm.from ,
      text: mail.message
    }).then(res=>{
        vm.loading = false;
        vm.msg = document.getElementById('msg').value = '';
        vm.from = document.getElementById('from').value = '';
        vm.serverMessage = '! Message sent successfully';
    });
  }

})();
