import { useEffect, useState } from "react";
import axios from "axios";
import { Card } from "primereact/card";
import styles from "../styles/FullStackPage.module.css";

function Projects() {
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
    <>
      <div className="card flex flex-wrap gap-4 justify-content-center mt-3">
        {projects.map((project) => {
          const header = (
            <div className={styles.image_wrapper2}>
              <img
                alt="Card"
                src="projects.jpeg"
                className={styles.project_image}
              />
              <div className={styles.image_overlay}>
                <button className={styles.image_button}>View</button>
              </div>
            </div>
          );

          return (
            <Card
              unstyled={true}
              key={project.id}
              title={
                <span>
                  <i
                    className="pi pi-circle-fill"
                    style={{
                      color: "lawngreen",
                      marginRight: "0.5rem",
                      marginBottom: "1rem",
                    }}
                  ></i>
                  {project.title}
                </span>
              }
              // subTitle={project.technologies}
              subTitle={
                project.technologies?.length
                  ? project.technologies.map((tech) => tech.name).join(", ")
                  : "No technologies"
              }
              header={header}
              //   className={`${styles.project_card} w-full sm:w-80 md:w-96`}
              //   className={`${styles.project_card} md:w-25rem`}
              className={`${styles.project_card}  w-25rem sm:w-80 md:w-96`}
            >
              <p>{project.description}</p>
            </Card>
          );
        })}
      </div>
    </>
  );
}

export default Projects;
