function get_text(event)
{
	var string = event.textContent;
    var id = event.id;

		document.getElementsByName('search_box')[0].value = string;
        document.getElementsByName('search_box')[0].step = id;
		document.getElementById('search_result').innerHTML = '';

	
}

function load_data(query)
{
	if(query.length > 2)
	{
		var form_data = new FormData();

		form_data.append('query', query);

		var ajax_request = new XMLHttpRequest();

		ajax_request.open('POST', 'process_data.php');

		ajax_request.send(form_data);

		ajax_request.onreadystatechange = function()
		{
			if(ajax_request.readyState == 4 && ajax_request.status == 200)
			{
				var response = JSON.parse(ajax_request.responseText);

				var html = '<div class="list-group">';

				if(response.length > 0)
				{
					for(var count = 0; count < response.length; count++)
					{
						html += '<a href="#" id="'+response[count].id+'" class="list-group-item list-group-item-action" onclick="get_text(this)">'+response[count].commonMedications+'</a>';
					}
				}
				else
				{
					html += '<a href="#" id="-1" class="list-group-item list-group-item-action disabled">No Data Found</a>';
				}

				html += '</div>';

				document.getElementById('search_result').innerHTML = html;
			}
		}
	}
	else
	{
		document.getElementById('search_result').innerHTML = '';
	}
}
