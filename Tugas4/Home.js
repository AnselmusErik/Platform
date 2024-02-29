document.addEventListener('DOMContentLoaded', (event) => {
    document.getElementById('myForm').addEventListener('OK', function (event) {
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

        button.addEventListener('click', function () {
            var inputs = container.getElementsByTagName('input');
            var radioContainer = document.createElement('div');

            for (var i = 0; i < inputs.length; i++) {
                var radio = document.createElement('input');
                radio.type = 'radio';
                radio.name = 'pilihan';
                radio.value = inputs[i].value;

                var label = document.createElement('label');
                label.textContent = inputs[i].value;

                radioContainer.appendChild(radio);
                radioContainer.appendChild(label);
                radioContainer.appendChild(document.createElement('br'));
            }

            var submitbutton = document.createElement('button');
            submitbutton.type = 'button';
            submitbutton.className = 'btn btn-primary';
            submitbutton.textContent = 'Submit';

            radioContainer.appendChild(submitbutton);
            container.appendChild(radioContainer);
        });
    });
});


// saya ingin dari code yang saya berikan itu supaya ketika user

