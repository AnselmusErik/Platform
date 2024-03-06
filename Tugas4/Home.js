document.addEventListener('DOMContentLoaded', (event) => {
    document.getElementById('myForm').addEventListener('submit', function (event) {
        event.preventDefault();

        var nama = document.getElementById('exampleInputName').value;
        var jumlah = document.getElementById('exampleInputNumber').value;

        // Cek apakah nama hanya mengandung huruf
        if (!/^[a-zA-Z\s]*$/.test(nama)) {
            alert("Nama hanya bisa menggunakan huruf");
            event.preventDefault();
            return;
        }
        var container = document.getElementById('namesContainer');
        container.innerHTML = '';

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

        var button = document.createElement('button');
        button.type = 'button';
        button.className = 'btn btn-primary';
        button.textContent = 'OK';
        container.appendChild(button);

        button.addEventListener('click', function () {
            var inputs = container.getElementsByTagName('input');
            var radioContainer = document.createElement('div');
            var pilihanText = '';

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

                pilihanText += inputs[i].value;
                if (i < inputs.length - 1) {
                    pilihanText += ', ';
                }
            }

            var submitbutton = document.createElement('button');
            submitbutton.type = 'button';
            submitbutton.className = 'btn btn-primary';
            submitbutton.textContent = 'Submit';

            radioContainer.appendChild(submitbutton);
            container.appendChild(radioContainer);

            submitbutton.addEventListener('click', function () {
                var pilihan = document.querySelector('input[name="pilihan"]:checked').value;

                var modalBody = document.querySelector('.modal-body');
                modalBody.textContent = 'Halo, nama saya ' + nama + '. Saya memiliki sejumlah ' + jumlah + ' pilihan yaitu ' + pilihanText + ' dan saya memilih ' + pilihan + '.';

                var myModal = new bootstrap.Modal(document.querySelector('.modal'));
                myModal.show();
            });
        });
    });

    document.querySelector('.modal').addEventListener('hidden.bs.modal', function () {
        var inputs = document.querySelectorAll('input');
        for (var i = 0; i < inputs.length; i++) {
            inputs[i].value = '';
        }
        var container = document.getElementById('namesContainer');
        while (container.firstChild) {
            container.removeChild(container.firstChild);
        }
    });
});
