import styles from "../styles/HomePage.module.css";
import Element from "../components/Element";
import Companies from "../components/Companies";
import "primeicons/primeicons.css";

function HomePage() {
  return (
    <>
      <Element />

      {/* intro infornation */}
      <div className={styles.intro_info}>
        <span style={{ color: "lawngreen", fontSize: "20px" }}>Hello</span>
        <span style={{ color: "white", fontSize: "40px" }}>I am Alan Omam</span>

        <span
          style={{
            color: "white",
            border: "2px solid lawngreen",
            fontSize: "30px",
            borderRadius: "5px",
            padding: "10px",
            maxWidth: "70%",
          }}
        >
          Sofware Developer
        </span>

        <p style={{ color: "white", fontSize: "20px" }}>
          I am a full stack sofware developer,i fluently speak english,french
          and italian. My main goal is to help individuals and companies
          digitalize and/or automate aspects of their daily work, improving
          efficiency and streamlining operations.
        </p>
      </div>

      {/* links to social media  */}
      <div className={styles.socials}>
        <a
          href="https://www.linkedin.com/in/alan-omam-2b01131b0/"
          target="_blank"
          rel="noopener noreferrer"
        >
          <i
            style={{ color: "lawngreen", fontSize: "35px" }}
            className="pi pi-linkedin"
          ></i>
        </a>

        <a
          href="https://github.com/ALANOMAM"
          target="_blank"
          rel="noopener noreferrer"
        >
          <i
            style={{ color: "lawngreen", fontSize: "35px" }}
            className="pi pi-github"
          ></i>
        </a>
      </div>

      {/* my image */}
      {/* <div className={styles.imageWrapper}>
        <img src="/alan.png" alt="alan-image" className={styles.profileImage} />
      </div> */}

      <Companies />
    </>
  );
}

export default HomePage;
