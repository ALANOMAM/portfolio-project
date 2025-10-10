import Projects from "../components/Projects";
import styles from "../styles/WorkPagesStyle.module.css";

function FullStackPage() {
  //based on how i seed the category table, this page corresponds to this category
  const category = 2;

  return (
    <div>
      <h1 className={styles.title}>Full Stack Projects</h1>
      <Projects categoryIdProp={category} />
    </div>
  );
}

export default FullStackPage;
