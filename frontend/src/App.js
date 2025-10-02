// import "./App.css";

// function App() {
//   return (
//     <div className="App">
//       <header className="App-header">hello</header>
//     </div>
//   );
// }

// export default App;

import { useEffect, useState } from "react";
import axios from "axios";
import "./App.css";

function App() {
  const [projects, setProjects] = useState([]);

  useEffect(() => {
    axios
      .get("http://localhost:8081/api/projects")
      .then((response) => {
        setProjects(response.data);
      })
      .catch((error) => {
        console.error("Error fetching projects:", error);
      });
  }, []);

  return (
    <div className="App">
      <header className="App-header">My Projects</header>

      <div className="project-list">
        {projects.map((project) => (
          <div key={project.id} className="project-card">
            <h3>{project.title}</h3>
            <p>{project.description}</p>
            <small>
              Created at: {new Date(project.created_at).toLocaleDateString()}
            </small>
          </div>
        ))}
      </div>
    </div>
  );
}

export default App;
