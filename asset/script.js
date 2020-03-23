$.ajax({
	url: 'https://api.kawalcorona.com',
	type: 'get',
	dataType: 'json',
	success: function(result) {
		$.each(result, function (i, data) {
			$('#global').append(`
				<tr>
					<td>` + i +`</td>
					<td>` + data.attributes.Country_Region +`</td>
					<td>` + data.attributes.Confirmed +`</td>
					<td>` + data.attributes.Recovered +`</td>
					<td>` + data.attributes.Deaths +`</td>
				</tr>
			`)
		})
	}
})


