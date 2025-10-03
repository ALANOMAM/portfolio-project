import styles from "../styles/HomePage.module.css";
import Element from "../components/Element";
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
          }}
        >
          Sofware Developer
        </span>

        <p style={{ color: "white", fontSize: "20px" }}>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam
          commodi dolor, quibusdam explicabo, soluta nesciunt obcaecati
          consequatur minus accusantium eum quo harum! Eius cum illo quod modi
          tempora dolorum similique?
        </p>
      </div>

      {/* links to social media  */}
      <div className={styles.socials}>
        <a href="https://www.linkedin.com/in/alan-omam-2b01131b0/">
          <i
            style={{ color: "lawngreen", fontSize: "35px" }}
            className="pi pi-linkedin"
          ></i>
        </a>

        <a href="https://github.com/ALANOMAM">
          <i
            style={{ color: "lawngreen", fontSize: "35px" }}
            className="pi pi-github"
          ></i>
        </a>
      </div>

      {/* my image */}
      <div className={styles.imageWrapper}>
        <img src="/alan.png" alt="alan-image" className={styles.profileImage} />
      </div>
    </>
  );
}

export default HomePage;
