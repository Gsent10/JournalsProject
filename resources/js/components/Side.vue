<template>
    <div class="side-bar">
        <div class="logo-name">
            <h1>
                CORE
            </h1>
        </div>

        <ul>
            <li>
                <a href="#" >Dashboard</a>
            </li>
            <li>
                <a href="#" >Payment</a>
            </li>
            <li>
                <a href="#" >Settings</a>
            </li>
            <li>
                <a href="#" >Help</a>
            </li>
        </ul>

        <div class="search">
            <form action="#">
                <input type="text" placeholder="Search">
                <button type="submit">Search</button>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style scoped>
a{
    text-decoration: none;
}

ul {
    list-style: none;
}

.side-bar {
    position: fixed;
    width: 20vw;
    height: 100%;
    display: flex;
    flex-direction: column;
    z-index: -100;
    box-shadow: 0 0.125rem 0.25rem rgb(0 0 0 / 8%);
}

.side-bar .logo-name {
    height: 10vh;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 10%;
    margin-bottom: 20%;
}

.side-bar .logo-name h1 {
    color: rgba(0, 0, 0, 0.8);
    border: 2px solid rgba(0, 0, 0, 0.8);
    padding: 7px 12px;
    cursor: pointer;
}

.side-bar .logo-name h1:hover {
    background: rgba(0, 0, 0, 0.8);
    color: #f8f9fa;
    padding: 7px 12px;
}

.side-bar li a{
    color: rgba(0, 0, 0, 0.8);
    font-size: 24px;
    padding: 10px 40px;
    display: flex;
    align-items: center;
    cursor: pointer;
}

.side-bar li:hover {
    background: rgba(0, 0, 0, 0.8);
    color: #f8f9fa;
}

.side-bar .search {
    width: 80%;
    align-self: center;
}

.side-bar .search form{
    position: relative;
}

.side-bar .search form input[type=text] {
    font-family: 'Poppins', sans-serif;
    font-weight: 400;
    font-size: 16px;
    line-height: 200%;
    color: rgb(0,0,0,0.2);
    border-radius: 8px;
    padding: 5px;
    border: 2px solid rgb(0,0,0,0.2);
    width: 100%;
}

.side-bar .search form button{
    position: absolute;
    right: 5px;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(0, 0, 0, 0.8);
    border-radius: 8px;
    padding: 4px 12px;
    border: 0;
    font-family: 'Poppins', sans-serif;
    font-weight: 400;
    font-size: 16px;
    color: white;
    cursor: pointer;
}
</style>
