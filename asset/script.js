$.ajax({
	url: 'https://opendata.arcgis.com/datasets/0c0f4558f1e548b68a1c82112744bad3_0.geojson',
	type: 'get',
	dataType: 'json',
	success: function (result) {

		$.each(result.features, function (i, data) {
			let allData = data.properties
			
			$('#indo').append(`
				<tr>
				<td>` + i +`</td>
				<td>` + allData.Provinsi +`</td>
				<td>` + allData.Kasus_Posi +`</td>
				<td>` + allData.Kasus_Semb +`</td>
				<td>` + allData.Kasus_Meni +`</td>
				</tr>
			`)
		})
	}
})




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


