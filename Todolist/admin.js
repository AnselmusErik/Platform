window.onload = function () {
    var todolist = document.getElementById("todolist");

    todolist.addEventListener("mouseover", function () {
        todolist.style.animationPlayState = "running";
    });

    todolist.addEventListener("mouseout", function () {
        todolist.style.animationPlayState = "paused";
    });
}
