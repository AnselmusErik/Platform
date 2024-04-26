document.addEventListener('DOMContentLoaded', function() {
    var todolistItems = document.querySelectorAll('#todolist li');

    todolistItems.forEach(function(item) {
        item.addEventListener('mouseover', function() {
            this.style.backgroundColor = '#f9f9f9';
        });

        item.addEventListener('mouseout', function() {
            this.style.backgroundColor = '#fff';
        });
    });
});
