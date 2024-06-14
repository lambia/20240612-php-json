const { createApp } = Vue

createApp({
  data() {
    return {
        //Dati locali
        students: [],
        newStudentName: "",
        newStudentSurname: "",
        //Dati per le richieste
        apiUrl: "../server.php",
        postRequestConfig: {
          headers: {
            'Content-Type': 'multipart/form-data'
          }
        }
    }
  },
  methods: {

    getTasksList() {

      axios.get(this.apiUrl).then(results => {
        console.log("Risultati: ", results.data);
        this.students = results.data;
      });

    },

    addTask() {
      console.log("aggiungi task", this.newTask);

      const newStudent = {
        name: this.newStudentName,
        last_name: this.newStudentSurname,
        isIscritto: true
      };

      axios.post(this.apiUrl, newStudent, this.postRequestConfig).then(results => {
        console.log("Risultati: ", results.data);
        this.students = results.data;
      });
    }

  },
  mounted() {
    console.log("Recupero i dati dal server");
    this.getTasksList();
    
  }
}).mount('#app')