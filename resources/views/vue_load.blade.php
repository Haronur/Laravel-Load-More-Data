<!DOCTYPE html>
<html>
<head>
  <style>    
    html, body {
      background-color: #fff;
      color: #636b6f;
      font-family: 'Nunito', sans-serif;
      font-weight: 200;
      height: 100vh;
      margin: 25px 35px;
    }
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }
    .button {
      background-color: #4CAF50;
      color: white;
      padding: 12px 28px;
      text-align: center;
      text-decoration: none;
      display: block;
      font-size: 16px;
      margin:12px auto;
      cursor: pointer;
    }
    .button2 {
      background-color: #464646;
      color: white;
      display: block;
      margin: 12px auto;
    }

    td, th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    tr:nth-child(even) {
      background-color: #dddddd;
    }
  </style>
</head>
<body>
  <div id="app">
    <button class="button2" > 
      <h2>Load More Data Using VueJS</h2>
    </button>

    <table>
      <tr>
        <th>SL No. </th>
        <th>Title</th>
        <th>Description</th>
      </tr>
      <tr v-for="(category, index) in categories" :key="index">
        <td>@{{index+1}}</td>
        <td>@{{category.title}}</td>
        <td>@{{category.description}}</td>
      </tr>
    </table>

    <div v-show="moreExists">
      <button type="button" class="button" v-on:click="loadMore"> Load More</button>
    </div>
  </div>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.6.7/vue.min.js"></script>
  <script type="text/javascript" src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <script>
    window.app = new Vue({
      el: '#app',
      data: {
        categories: [],
        moreExists: false,
        nextPage: 0,
        errors: {}
      },
      mounted: function () {
       this.loadCategories();
     },
     methods: {
      loadCategories: async function() {
        try {
          const response = await axios.get('/api/vue-loading/');
          console.log("Vue-Load: " + JSON.stringify(response.data));
          this.categories = response.data.data;

          if (response.data.current_page < response.data.last_page) {
            this.moreExists = true;
            this.nextPage = response.data.current_page + 1;
          } else {
            this.moreExists = false;
          }
        } catch (error) {
        }
      },
      loadMore: async function() {
        try {
          const response = await axios.get('/api/vue-loading?page='+this.nextPage);
          if (response.data.current_page < response.data.last_page) {
            this.moreExists = true;
            this.nextPage = response.data.current_page + 1;
          } else {
            this.moreExists = false;
          }

          response.data.data.forEach(data => {
            this.categories.push(data);
          });
        } catch (error) {
          this.flashMessage.error({
            message: 'Some error occurred during loading more categories',
            time: 5000
          });
        }
      }
    }
  })
</script>
</body>
</html>
