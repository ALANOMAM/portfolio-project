import styles from "../styles/WorkPagesStyle.module.css";
import Projects from "../components/Projects";

function BlockchainPage() {
  //based on how i seed the category table, this page corresponds to this category
  const category = 3;

  return (
    <div>
      <h1 className={styles.title}>Blockchain Projects</h1>
      <Projects categoryIdProp={category} />
    </div>
  );
}

export default BlockchainPage;
