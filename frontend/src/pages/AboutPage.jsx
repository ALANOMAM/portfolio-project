import styles from "../styles/AboutPage.module.css";

function AboutPage() {
  return (
    <div>
      <h1 className={styles.title}>About me</h1>
      {/* my image */}
      <div className={styles.imageWrapper}>
        <img src="/alan.png" alt="alan-image" className={styles.profileImage} />
      </div>

      <div className={styles.content_container}>
        <div>
          <h2 className={styles.section_title}>EDUCATION</h2>
          <ul className={styles.section_content}>
            <li>
              I have a{" "}
              <span style={{ color: "lawngreen" }}>
                bachelor's degree in physics
              </span>{" "}
              completed in Bologna, Italy at the{" "}
              <span style={{ color: "lawngreen" }}>Augusto Righi</span>{" "}
              institute.
            </li>
            <li>
              For the most part i learned and i am still learning web
              development on my own,through courses, conferences and projects i
              created. On my journey i attended some coding bootcamps like
              <span style={{ color: "lawngreen" }}> boolean</span> bootcamp
              based in Milan, Italy that helped me refine my skills.
            </li>
          </ul>
        </div>
        <div>
          <h2 className={styles.section_title}>TECHNOLOGIES</h2>
          <p className={styles.section_content}>
            As my journey goes on the list is getting longer, so for more up to
            date information go the{" "}
            <span style={{ color: "lawngreen" }}>work</span> section where as i
            publish new projects with the technologies i used. For now as a base
            i use
          </p>
          <ul
            style={{
              color: "lawngreen",
              backgroundColor: "black",
              width: "fit-content",
            }}
          >
            <li>Docker</li>
            <li>Laravel (so also php)</li>
            <li>Express.js (so also javascript)</li>
            <li>React.js</li>
            <li>Mysql</li>
          </ul>
        </div>
        <div>
          <h2 className={styles.section_title}>LANGUAGES</h2>
          <p className={styles.section_content}>
            I write and speak fluently in{" "}
            <span style={{ color: "lawngreen" }}>english</span>,{" "}
            <span style={{ color: "lawngreen" }}>french</span> and{" "}
            <span style={{ color: "lawngreen" }}>italian</span>, french being my
            first language, english the second and italian the third language.
          </p>
        </div>
      </div>
    </div>
  );
}

export default AboutPage;
