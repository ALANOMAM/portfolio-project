import styles from "../styles/WorkPagesStyle.module.css";
import Projects from "../components/Projects";

function DevOpsPage() {
  //based on how i seed the category table, this page corresponds to this category
  const category = 4;

  return (
    <div>
      <h1 className={styles.title}>DevOps Projects</h1>
      <Projects categoryIdProp={category} />
    </div>
  );
}

export default DevOpsPage;
