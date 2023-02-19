$(document).ready(function() {
	$("#send").click(function () {
		var log=$("#log_data").val();
		var pass=$("#pass_data").val();
		$.ajax({
			url: 'data.php',         	 /* Куда отправить запрос */
    		method: 'post',              /* Метод запроса (post или get) */
		    data: {"login": log,"pass":pass},     /* Данные передаваемые в массиве */
		    success: function(data){   	 /* функция которая будет выполнена после успешного запроса.  */
			     		
			     //$("#container").load(data);
			     $("#container").html(data);				 /* В переменной data содержится ответ от data.php. */
    			}

		})
	


	});
});