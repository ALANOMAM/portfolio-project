import { useEffect, useState } from "react";
import axios from "axios";
import { Card } from "primereact/card";
import styles from "../styles/WorkPagesStyle.module.css";

function Projects({ categoryIdProp, showComingSoonIfEmpty = false }) {
  const apiUrl = process.env.REACT_APP_API_URL;
  const assetUrl = process.env.REACT_APP_ASSET_URL;
  const [projects, setProjects] = useState([]);

  useEffect(() => {
    axios
      .get(`${apiUrl}/projects`)
      .then((response) => {
        setProjects(response.data);
      })
      .catch((error) => {
        console.error("Error fetching projects:", error);
      });
  }, []);

  console.log("PROJECTS", projects);

  const filteredProjects = projects.filter(
    (project) => project.category_id == categoryIdProp
  );

  return (
    <div className="card flex flex-wrap gap-4 justify-content-center mt-3 ">
      {
        // ONLY RETURNS THE PROJECT THAT MATCHES A SPECIFIC CATEGORY ID START
        filteredProjects.length > 0 ? (
          filteredProjects.map((project) => {
            const header = (
              <div className={styles.image_wrapper2}>
                <img
                  alt="Card"
                  src={`${assetUrl}/${project.image}`}
                  className={styles.project_image}
                />
                <div className={styles.image_overlay}>
                  {/* If i pass a go to link then the button to view appears START */}
                  {project.project_link && (
                    <button
                      className={styles.image_button}
                      onClick={() =>
                        window.open(project.project_link, "_blank")
                      }
                    >
                      View
                    </button>
                  )}
                  {/* If i pass a go to link then the button to view appears END */}
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
                subTitle={
                  project.technologies?.length
                    ? project.technologies.map((tech) => tech.name).join(", ")
                    : "No technologies"
                }
                header={header}
                className={`${styles.project_card} w-25rem sm:w-80 md:w-96`}
              >
                <p>{project.description}</p>

                {project.video && (
                  <video controls className={styles.video_container}>
                    <source
                      src={`${assetUrl}/${project.video}`}
                      type="video/mp4"
                    />
                    Your browser does not support the video tag.
                  </video>
                )}
              </Card>
            );
          })
        ) : // ONLY RETURNS THE PROJECT THAT MATCHES A SPECIFIC CATEGORY ID END
        showComingSoonIfEmpty ? (
          <div className={styles.coming_soon}>
            <h2>🚧 Coming Soon</h2>
            <p> Working on awesome projects. Stay tuned!</p>
          </div>
        ) : null
      }
    </div>
  );
}

export default Projects;
