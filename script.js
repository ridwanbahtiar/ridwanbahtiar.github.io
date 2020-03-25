// Data World Postif
$.ajax({
	url: 'https://api.kawalcorona.com/positif',
	type: 'get',
	dataType: 'json',
	success: function (data) {
		$('#totalPositif').append(data.value)
	}
})

// Data World Sembuh
$.ajax({
	url: 'https://api.kawalcorona.com/sembuh',
	type: 'get',
	dataType: 'json',
	success: function (data) {
		$('#totalSembuh').append(data.value)
	}
})

// Data World Meninggal
$.ajax({
	url: 'https://api.kawalcorona.com/meninggal',
	type: 'get',
	dataType: 'json',
	success: function (data) {
		$('#totalMeninggal').append(data.value)
	}
})

// Data Coronavirus di indonesia
$.ajax({
	url: 'https://api.kawalcorona.com/indonesia',
	type: 'get',
	dataType: 'json',
	success: function (data) {
		$.each(data, function (i, result) {
			$('#positif').append(result.positif)
			$('#sembuh').append(result.sembuh)
			$('#meninggal').append(result.meninggal)
		})
	}
})

// Data Coronavirus di indonesia berdasarkan Provinsi
$.ajax({
	url: 'https://api.kawalcorona.com/indonesia/provinsi',
	type: 'get',
	dataType: 'json',
	success: function (data) {
		$.each(data, function (i, result) {
			$('#dataIndo').append(`
			<tr>
				<td>` + i + `</td>
				<td>` + result.attributes.Provinsi +`</td>
				<td>` + result.attributes.Kasus_Posi +`</td>
				<td>` + result.attributes.Kasus_Semb +`</td>
				<td>` + result.attributes.Kasus_Meni +`</td>
			</tr>
				`)
		})
	}
})

// Data Coronavirus Global
$.ajax({
	url: 'https://api.kawalcorona.com',
	type: 'get',
	dataType: 'json',
	success: function (data) {
		$.each(data, function (i, result) {
			$('#dataGlobal').append(`
			<tr>
				<td>` + i + `</td>
				<td>` + result.attributes.Country_Region +`</td>
				<td>` + result.attributes.Confirmed +`</td>
				<td>` + result.attributes.Recovered +`</td>
				<td>` + result.attributes.Deaths +`</td>
			</tr>
				`)
		})
	}
})