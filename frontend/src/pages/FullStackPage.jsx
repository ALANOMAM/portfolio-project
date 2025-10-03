import Projects from "../components/Projects";
import styles from "../styles/FullStackPage.module.css";

function FullStackPage() {
  return (
    <div>
      <h1 className={styles.title}>Full Stack Projects</h1>
      <Projects />
    </div>
  );
}

export default FullStackPage;
