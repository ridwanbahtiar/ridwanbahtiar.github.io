// Fungsi Format Number
function formatNumber(num) {
	return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,') 
}

//Fungsi Gender
function gender(g) {
	if (g == "Laki-laki") {
		return ` <img src="asset/dist/img/man5.png" alt="` + g + `" class="rounded-circle" width="25"></img> `
	} else if (g == "Perempuan") {
		return ` <img src="asset/dist/img/woman6.png" alt="` + g + `" class="rounded-circle" width="25"></img> `
	}
}

// Fungsi Status
function status(s) {
	if (s == "Sembuh") {
		return ` <span class="btn btn-icon btn-sm btn-success">` + s + `</span>`
	} else if (s == "Dalam Perawatan") {
		return ` <span class="btn btn-icon btn-sm btn-warning">` + s + `</span>`
	} else if (s == "Meninggal") {
		return ` <span class="btn btn-icon btn-sm btn-danger">` + s + `</span>`
	}
}

// Data World
$.ajax({
	url: 'https://covid-19.mathdro.id/api',
	type: 'get',
	dataType: 'json',
	success: function (data) {
		$('#totalPositif').append(formatNumber(data.confirmed.value))
		$('#totalSembuh').append(formatNumber(data.recovered.value))
		$('#totalMeninggal').append(formatNumber(data.deaths.value))
	}
})

// Data Coronavirus di indonesia
$.ajax({
	url: 'https://indonesia-covid-19.mathdro.id/api',
	type: 'get',
	dataType: 'json',
	success: function (data) {
		$('#positif').append(formatNumber(data.jumlahKasus))
		$('#dalamPerawatan').append(formatNumber(data.perawatan))
		$('#sembuh').append(formatNumber(data.sembuh))
		$('#meninggal').append(formatNumber(data.meninggal))
	}
})

// Data Coronavirus di indonesia berdasarkan Provinsi
$.ajax({
	url: 'https://indonesia-covid-19.mathdro.id/api/provinsi',
	type: 'get',
	dataType: 'json',
	success: function (data) {
		
		let datas = data.data
		$.each(datas, function (i, result) {
			$('#dataIndo').append(`
				<tr>
				<td>` + i + `</td>
				<td>` + result.provinsi +`</td>
				<td>` + formatNumber(result.kasusPosi) + `</td>
				<td>` + formatNumber(result.kasusSemb) + `</td>
				<td>` + formatNumber(result.kasusMeni) + `</td>
				</tr>
				`)
		})
	}
})

// Data Coronavirus di Indonesia perKasus
$.ajax({
	url: 'https://indonesia-covid-19.mathdro.id/api/kasus',
	type: 'get',
	dataType: 'json',
	success: function (data) {
		let datas = data.data.nodes
		$.each(datas, function (i, result) {
			$('#dataKasus').append(`
				<tr>
				<td>` + i + `</td>
				<td>` + formatNumber(result.kasus) +`</td>
				<td>` + result.umur +`</td>
				<td>` + gender(result.gender) + `</td>
				<td>` + status(result.status) + `</td>
				<td>` + result.wn + `</td>
				<td>` + result.klaster + `</td>
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
				<td>` + formatNumber(result.attributes.Confirmed) + `</td>
				<td>` + formatNumber(result.attributes.Recovered) + `</td>
				<td>` + formatNumber(result.attributes.Deaths) + `</td>
				</tr>
				`)
		})
	}
})