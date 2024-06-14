const { createApp } = Vue

createApp({
  data() {
    return {
        students: [],
        newStudentName: "",
        newStudentSurname: ""
    }
  },
  methods: {

    addTask() {
      console.log("aggiungi task", this.newTask);

      const newStudent = {
        name: this.newStudentName,
        last_name: this.newStudentSurname
      };

      this.students.push(newStudent);
    }

  },
  mounted() {
    console.log("Recupero i dati dal server");

    axios.get("../server.php").then(results => {
        console.log("Risultati: ", results);
        this.students = results.data;
    });
  }
}).mount('#app')