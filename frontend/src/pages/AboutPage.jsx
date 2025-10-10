import styles from "../styles/AboutPage.module.css";

function AboutPage() {
  return (
    <div>
      <h1 className={styles.title}>About</h1>
      {/* my image */}
      <div className={styles.imageWrapper}>
        <img src="/alan.png" alt="alan-image" className={styles.profileImage} />
      </div>
    </div>
  );
}

export default AboutPage;
