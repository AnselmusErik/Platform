document.addEventListener('DOMContentLoaded', (event) => {
    document.getElementById('myForm').addEventListener('submit', function(event) {
        // Mencegah form dikirim secara default
        event.preventDefault();

        // Mengambil jumlah dari input
        var jumlah = document.getElementById('exampleInputNumber').value;

        // Mengambil elemen tempat menampilkan input nama
        var container = document.getElementById('namesContainer');

        // Menghapus input nama sebelumnya
        container.innerHTML = '';

        // Membuat input nama baru sesuai jumlah
        for (var i = 0; i < jumlah; i++) {
            var div = document.createElement('div');
            div.className = 'mb-3';

            var label = document.createElement('label');
            label.className = 'form-label';
            label.htmlFor = 'exampleInputName' + (i + 1);
            label.textContent = 'Pilihan' + (i + 1);

            var input = document.createElement('input');
            input.type = 'text';
            input.className = 'form-control';
            input.id = 'exampleInputName' + (i + 1);
            input.placeholder = 'Pilihan Anda';

            div.appendChild(label);
            div.appendChild(input);

            container.appendChild(div);
        }

        // Membuat tombol baru
        var button = document.createElement('button');
        button.type = 'button';
        button.className = 'btn btn-primary';
        button.textContent = 'OK';

        // Menambahkan tombol ke dalam container
        container.appendChild(button);
    });
});




// // Mengatur radio Button

// document.getElementById('myForm').addEventListener('submit', function (event) {
//     // Mencegah form dikirim secara default
//     event.preventDefault();

//     // Mengambil jumlah dari input
//     var jumlah = document.getElementById('exampleInputNumber').value;

//     // Mengambil elemen tempat menampilkan pilihan
//     var container = document.getElementById('choicesContainer');

//     // Menghapus pilihan sebelumnya
//     container.innerHTML = '';

//     // Membuat pilihan baru sesuai jumlah
//     for (var i = 0; i < jumlah; i++) {
//         var choice = document.createElement('div');
//         choice.className = 'form-check';

//         var input = document.createElement('input');
//         input.className = 'form-check-input';
//         input.type = 'radio';
//         input.name = 'flexRadioDefault';
//         input.id = 'flexRadioDefault' + (i + 1);

//         var label = document.createElement('label');
//         label.className = 'form-check-label';
//         label.htmlFor = 'flexRadioDefault' + (i + 1);
//         label.textContent = 'Pilihan ' + (i + 1);

//         choice.appendChild(input);
//         choice.appendChild(label);

//         container.appendChild(choice);
//     }
// });




