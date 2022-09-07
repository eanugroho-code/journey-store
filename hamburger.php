<style>
    

#menu{
    width: 25px;
    height: 100%;
    margin: 0;
    cursor: pointer;
}

.bar{
    height: 5px;
    width: 100%;
    background-color: #b81568;
    display: block;
    border-radius: 5px;
}

#bar1{
    transform: translateY(-4px);
}

#bar3{
    transform: translateY(4px);
}
</style>
<body>
            <div id="menu-bar">
                <div id="menu" onclick="onClickMenu()">
                <div id="bar1" class="bar"></div>
                <div id="bar2" class="bar"></div>
                <div id="bar3" class="bar"></div>
                </div>
            </div>
    <script src="hamburger.js"></script>
</body>
</html>