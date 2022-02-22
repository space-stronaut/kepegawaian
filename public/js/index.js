let arr = []
const ctx = document.getElementById('myChart').getContext('2d');
fetch('/api/data')
    .then(res => res.json())
    .then(e => 
    // console.log(arr),
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: 
                e.data.map(r => {
                    return r.nama_cabang + ' - ' +r.nama
                })
            ,
            datasets: [{
                label: '# of Votes',
                data: e.data.map(r => {
                    return r.jumlah
                }),
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    })
    )