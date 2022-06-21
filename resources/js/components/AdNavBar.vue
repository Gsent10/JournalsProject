<template>
    <div class="side-bar">
        <div class="header">
            <div class="nav">
                <div class="search">
                    <form action="#">
                        <input type="text" placeholder="Search">
                        <button type="submit">Search</button>
                    </form>
                </div>
            </div>
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

.header {
    position: fixed;
    top: 0;
    right: 0;
    width: 80vw;
    height: 10vh;
    background: white;
    display: flex;
    justify-content: center;
    align-items: center;
    box-shadow: 0 4px 8px 0 rgb(0,0,0,0.2);
}

.header .nav {
    width: 90%;
    justify-content: end;
}

.header .nav .search {
    width: 50%;
}

.header .nav .search form{
    position: relative;
}

.header .nav .search form input[type=text] {
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

.header .nav .search form button{
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
